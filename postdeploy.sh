#!/bin/bash

updatedFiles=$(git log --format="%H" -n 2 | xargs git diff --name-only)
for file in $updatedFiles
do
  if [ -f "./$file" ]
  then
    rsync -avhR $file $DEPLOYPATH/$file
  fi
done

cd ~/repositories/qudsinfo-wp-theme/layout
~/bin/npm install
~/bin/npm run css:build
rsync -avh dist/ $DEPLOYPATH/layout/dist