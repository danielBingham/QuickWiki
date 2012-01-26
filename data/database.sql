

/**
* Table to store visitor information so we can
* track which visitors perform which edits.
*
*/
CREATE TABLE `visitor` (
    `id` int unsigned NOT NULL AUTO_INCREMENT,
    `ip` int(11) unsigned,
    PRIMARY KEY (`id`),
    UNIQUE INDEX `ip` (`ip`)
) ENGINE=MyISAM DEFAULT CHARSET=UTF8;

-- Insert our initial visitor test data. 
INSERT INTO `visitor` (`ip`) VALUES (INET_ATON('127.0.0.1'));

/**
* The primary article table.
*
* NOTE: The article_revision_id field needs to be able to
* be null in order for us to actually add to this table.
*/
CREATE TABLE `article` (
    `id` int unsigned NOT NULL AUTO_INCREMENT,
    `article_revision_id` int unsigned, 
    PRIMARY KEY (`id`),
    KEY `article_revision_id` (`article_revision_id`)
) ENGINE=MyISAM DEFAULT CHARSET=UTF8;

-- Insert our initial test data for the article table.
INSERT INTO `article` (`article_revision_id`) VALUES (1);


/**
* Table for article revisions.  id acts at the revision id
* and the table links the revision to the article and the 
* visitor who performs the edit.  The content of the revision
* is stored in a separate table that keys to this one (in case we find ourselves
* needed innoDB for this table, but still want FULLTEXT search
* on the article content).  
*/
CREATE TABLE `article_revision` (
    `id` int unsigned NOT NULL AUTO_INCREMENT,
    `article_id` int unsigned NOT NULL,
    `visitor_id` int unsigned NOT NULL,
    `title` varchar(128),
    `message` varchar(1024),
    `created` datetime,
    PRIMARY KEY (`id`),
    KEY `article_id` (`article_id`),
    KEY `visitor_id` (`visitor_id`),
    FULLTEXT (`title`)
) ENGINE=MyISAM DEFAULT CHARSET=UTF8;

-- Insert our initial test data for the article_revision table.
INSERT INTO `article_revision` (`article_id`, `visitor_id`, `title`, `message`, `created`) VALUES (1,1, 'Test Article', 'Initial revision', NOW());

/**
*  Table for article content, keys to article_revisions and 
* has a full text index on the content text field.
*/
CREATE TABLE `article_content` (
    `article_revision_id` int unsigned NOT NULL,
    `content` text,
    PRIMARY KEY (`article_revision_id`),
    FULLTEXT (`content`)
) ENGINE=MyISAM DEFAULT CHARSET=UTF8;

-- Initial test data for the article_content table.
INSERT INTO `article_content` (`article_revision_id`, `content`) VALUES (1, 'This is a test article.');



