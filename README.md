##Setup git deployment

git remote add production ssh://natpol3@sprlaw.com/sprlaw_com.git
git remote add staging ssh://natpol3@sprlaw.com/stage.sprlaw_com.git

[local project]$ git push staging master
[local project]$ git branch --set-upstream master origin/master


http://toroid.org/ams/git-website-howto

## create dev site

git clone https://github.com/WordPress/WordPress.git

create symbolic link of wp-config and move to Wordpress directory

Download current plugins

        scp -r natpol3@sprlaw.com:sprlaw.dreamhosters.com/content/wp-content/plugins

make symbolic link of plugins and move into correct place in Wordpress

        ln -f -s plugins Wordpress/wp-content/__plugins
        rm -r Wordpress/wp-content/plugins
        mv -f Wordpress/wp-content/__plugins Wordpress/wp-content/plugins


## Plugins Used

* Advanced Custom Fields
* Askimet
* All In One SEO Pack
* Custom Post Template
* Custom Post Type UI
* Featured Image
* Font Awesome
* Google Sitemap Generator
* JetPack
* Mobble
* More Types
* Multiple Post Thumbnails
* Twitter Tools
* User Photo
* Wordpress Importer

##TODO:

need to move issues from old repository:

        http://stackoverflow.com/questions/9720718/how-do-i-move-an-issue-on-github-to-another-repo