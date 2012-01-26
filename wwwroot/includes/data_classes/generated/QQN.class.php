<?php
	class QQN {
		/**
		 * @return QQNodeArticle
		 */
		static public function Article() {
			return new QQNodeArticle('article', null, null);
		}
		/**
		 * @return QQNodeArticleContent
		 */
		static public function ArticleContent() {
			return new QQNodeArticleContent('article_content', null, null);
		}
		/**
		 * @return QQNodeArticleRevision
		 */
		static public function ArticleRevision() {
			return new QQNodeArticleRevision('article_revision', null, null);
		}
		/**
		 * @return QQNodeVisitor
		 */
		static public function Visitor() {
			return new QQNodeVisitor('visitor', null, null);
		}
	}
?>