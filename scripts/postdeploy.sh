#!/bin/bash

updatedFiles=$(git log --format="%H" -n 2 | xargs git diff --name-only)
for file in $updatedFiles
do
  cp $file $DEPLOYPATH$file
done

cd ../layout
npm run build
cp -r dist $DEPLOYPATH/layout/dist