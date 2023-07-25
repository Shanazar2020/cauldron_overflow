#!/bin/bash

# List of conflicting files
files=(
".gitignore"
".idea/cauldron_overflow.iml"
".idea/codeception.xml"
".idea/php.xml"
".idea/phpspec.xml"
".idea/phpunit.xml"
"LICENSE"
"bin/console"
"composer.json"
"composer.lock"
"config/bundles.php"
"config/packages/cache.yaml"
"config/packages/framework.yaml"
"config/packages/monolog.yaml"
"config/packages/routing.yaml"
"config/packages/twig.yaml"
"config/services.yaml"
"public/index.php"
)

# Loop through the list of files and run the commands
for file in "${files[@]}"; do
  git checkout --theirs "$file"
  git add "$file"
done
