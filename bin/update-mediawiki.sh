# Update core, extensions, and skins.
time for i in . extensions/*/ skins/*/; do
  echo "************Updating $i************"
  git checkout master
  git -C "$i" pull
	git -C "$i" submodule update --init
done

# Update the database schema.
php maintenance/update.php
