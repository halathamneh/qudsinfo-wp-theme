#!/bin/bash

cd ~/repositories/qudsinfo-wp-theme/
updatedFiles=$(git log --format="%H" -n 2 | xargs git diff --name-only)
for file in $updatedFiles
do
  rsync -aR $file $DEPLOYPATH/$file
done

cd layout
~/bin/npm run build
rsync -aR dist $DEPLOYPATH/layout/dist