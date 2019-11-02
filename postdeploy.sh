#!/bin/bash
updateLayout=0
updatedFiles=$(git log --format="%H" -n 2 | xargs git diff --name-only)
for file in $updatedFiles; do
  if [ -f "./$file" ]; then
    if [[ $file == layout* ]]; then
      updateLayout=1
    fi
    rsync -avh -I "$file" "$DEPLOYPATH/$file" && echo "Done ( $file )"
  fi
done

if [[ $updateLayout == 1 ]]; then
  cd ~/repositories/qudsinfo-wp-theme/layout || exit
  ~/bin/npm install
  ~/bin/npm run css:build
  rsync -avh -I dist/ "$DEPLOYPATH/layout/dist"
fi
