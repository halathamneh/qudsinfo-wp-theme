#!/bin/bash

updatedFiles=$(git log --format="%H" -n 2 | xargs git diff --name-only)
for file in $updatedFiles
do
  if [ -f "./$file" ]
  then
    rsync -aR $file $DEPLOYPATH/$file
  fi
done

cd ~/repositories/qudsinfo-wp-theme/layout
~/bin/npm run css:build
rsync -aR dist $DEPLOYPATH/layout/dist