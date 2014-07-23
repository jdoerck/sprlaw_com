git clone https://github.com/WordPress/WordPress.git

create symbolic link of wp-config and move to Wordpress directory

scp -r natpol3@sprlaw.com:sprlaw.dreamhosters.com/content/wp-content/plugins .

make symbolic link of plugins and move into correct place in Wordpress
ln -f -s plugins Wordpress/wp-content/__plugins
rm -r Wordpress/wp-content/plugins
mv -f Wordpress/wp-content/__plugins Wordpress/wp-content/plugins