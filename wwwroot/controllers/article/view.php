<?php
/**
 * Copyright:
 *		Copyright (C) 2012 Daniel Bingham (http://www.theroadgoeson.com)
 *
 * License:
 *
 * This software is licensed under the MIT Open Source License which reads as
 * follows:
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy of
 * this software and associated documentation files (the "Software"), to deal in the
 * Software without restriction, including without limitation the rights to use, copy,
 * modify, merge, publish, distribute, sublicense, and/or sell copies of the Software,
 * and to permit persons to whom the Software is furnished to do so, subject to the
 * following conditions:
 *
 * The above copyright notice and this permission notice shall be included in all copies
 * or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED,
 * INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR
 * PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE
 * LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT,
 * TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE
 * USE OR OTHER DEALINGS IN THE SOFTWARE.
 *
 * For more information see here: http://www.opensource.org/licenses/mit-license.php
 */

class ViewAction extends QForm {
    protected $objArticle;

    private $objCache;  
    private $mixArticleId;
    private $mixHitCounter;

    // Standard Form Hooks
    // {{{ Form_Create():                                               protected void

    protected function Form_Create() {
       $this->loadArticle(); 
    }

    // }}}

    // Custom Methods
    // {{{ loadArticle():                                               protected void
    /**
    * Load this article from either the cache or the db.  In the process of loading it,
    * determine whether or not it is time to save it in the cache.
    */ 
    protected function loadArticle() {
        $this->objCache = new MemcacheService();
        $this->mixArticleId = QApplication::PathInfo(2);

        // Register the fact that this article has recieved a view.
        $this->registerHit();

        // Attempt to load the article from the cache.
        if(null === ($this->objArticle = $this->loadArticleFromCache())) {
            
            // If it failed, then load it from the database.
            $this->objArticle = $this->loadArticleFromDb();

            // And check to see if we need to catch it.
            if($this->needToCacheArticle()) {

                // If we do, then go ahead and cache it.
                $this->cacheArticle(); 
            } 
        }
    }

    // }}}
    // {{{ registerHit():                                                protected void
    /**
    * Increment this article's hit counter in the cache.
    */ 
    protected function registerHit() {
        if($this->objCache->hasKey('view_counter_' . $this->mixArticleId)) {
            $this->mixHitCounter = $this->objCache->get('view_counter_' . $this->mixArticleId)+1;
            $this->objCache->set('view_counter_' . $this->mixArticleId, $this->mixHitCounter, (60*60));
        } else {
            $this->objCache->set('view_counter_' . $this->mixArticleId, 1, (60*60));
        }
    }

    // }}} 
    // {{{ loadArticleFromCache():                                      protected Article
    /**
    * Attempt to load this article from the cache.  If it isn't in the cache, return
    * null.
    */ 
    protected function loadArticleFromCache() {
        if($this->objCache->hasKey('view_article_' . $this->mixArticleId)) {
            return $this->objCache->get('view_article_' . $this->mixArticleId);
        } else {
            return null;
        }
    }

    // }}}
    // {{{ needToCacheArticle():                                        protected boolean
    /**
    * Check the hit counter, if the hit counter is greater than some number (100)
    * then return true (we need to cache) otherwise, false (we don't). 
    */
    protected function needToCacheArticle() {
        if($this->mixHitCounter > 100) {
           return true; 
        } 
        return false;
    }
    
    // }}}
    // {{{ cacheArticle():                                              protected void
    /**
    * Save our loaded article in the cache.
    */
    protected function cacheArticle() {
        if(empty($this->objArticle)) {
            throw new RuntimeException('You attempted to cache an article that you had not yet loaded!');
        }

        $this->objCache->set('view_article_' . $this->mixArticleId, $this->objArticle, (60*60));
        
    }

    // }}}
    // {{{ loadArticleFromDb():                                         protected Article
    /**
    *  Load this article from the database and return it.
    */ 
    protected function loadArticleFromDb() {
        if(empty($this->mixArticleId)) {
            throw new RuntimeException('You cannot load an article with out the article\'s id!');
        }
        
        return Article::QuerySingle(
            QQ::AndCondition(
                QQ::Equal(QQN::Article()->Id, $this->mixArticleId)
            ),
            QQ::Clause(
                QQ::Expand(QQN::Article()->ArticleRevision),
                QQ::Expand(QQN::Article()->ArticleRevision->ArticleContent) 
            )
        );
    }

    // }}}

}

?>
