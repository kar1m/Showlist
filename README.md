Showlist
========

the best app ever


---------------------------------------
Configuration 
=============

In the root folder open terminal : 
Install composer.phar:
<pre><code>
curl -s http://getcomposer.org/installer | php
</code></pre>



Install Symfony2:
<pre><code>
php composer.phar install
</code></pre>


Configure access to Database using WAMP or MAMP's mySQL parameters

For example

Host	localhost
Port	8889
User	root
Password	root

Create Database 
<pre><code>
php app/console doctrine:database:create
</code></pre>

Generate Tables
<pre><code>
php app/console doctrine:schema:update --dump-sql
php app/console doctrine:schema:update --force
</code></pre>

