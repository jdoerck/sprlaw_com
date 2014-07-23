
Setup git


git remote add production ssh://natpol3@sprlaw.com/sprlaw_com.git
git remote add staging ssh://natpol3@sprlaw.com/stage.sprlaw_com.git

[local project]$ git push staging master
[local project]$ git branch --set-upstream master origin/master


http://toroid.org/ams/git-website-howto


create dev site

git clone https://github.com/WordPress/WordPress.git

remove .git dir from Wordpress

create symbolic link of wp-config and move to Wordpress directory

scp -r natpol3@sprlaw.com:sprlaw.dreamhosters.com/content/wp-content/plugins .

make symbolic link of plugins and move into correct place in Wordpress
ln -f -s plugins Wordpress/wp-content/__plugins
rm -r Wordpress/wp-content/plugins
mv -f Wordpress/wp-content/__plugins Wordpress/wp-content/plugins