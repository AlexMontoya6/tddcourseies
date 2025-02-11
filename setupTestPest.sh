#!/bin/bash

# Define paths
STUBS_DIR="stubs/test"
COMMAND_DIR="app/Console/Commands"
COMMAND_FILE="$COMMAND_DIR/MakePestTest.php"

# Create stubs directory if not exists
echo "Creating stubs directory..."
mkdir -p $STUBS_DIR

# Create pest_test.stub file with custom content
echo "Creating pest_test.stub with custom content..."
cat <<EOL > $STUBS_DIR/pest_test.stub
<?php

use function Pest\Laravel\get;

it('', function () {
    //
});
EOL

# Create Commands directory if not exists
echo "Creating Commands directory..."
mkdir -p $COMMAND_DIR

# Create MakePestTest.php with the command logic
echo "Creating MakePestTest.php..."
cat <<EOL > $COMMAND_FILE
<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class MakePestTest extends Command
{
    protected \$signature = 'make:test-pest {name}';
    protected \$description = 'Create a Pest test with custom stub';

    public function handle()
    {
        \$name = \$this->argument('name');
        \$path = base_path("tests/Feature/{\$name}Test.php");

        if (File::exists(\$path)) {
            \$this->error('Test already exists!');
            return 1;
        }

        \$stub = File::get(base_path('stubs/test/pest_test.stub'));
        File::put(\$path, str_replace('{{ class }}', \$name, \$stub));

        \$this->info('Pest test created successfully.');
        return 0;
    }
}
EOL

# Dump autoload to register the new command
echo "Running composer dump-autoload..."
composer dump-autoload

echo "Setup completed! Use 'php artisan make:test-pest ExampleTest' to create a custom Pest test."
