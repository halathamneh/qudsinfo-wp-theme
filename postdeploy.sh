#!/bin/bash
updateLayout=0
updatedFiles=$(git diff-tree -r --name-only --no-commit-id HEAD^ HEAD)
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
