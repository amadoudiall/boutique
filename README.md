# boutique
Une boutique e-commerce

Pour executer cette app sur votre ordinateur vous avez besoin de:
- PHP-7.0 ^
- MySql
- Apache

# Configurer la base de donnée
Dans src/Bdd/Bdd.php
- Redfinissez le $username et le $password pour accéder a votre base de donnée.
- Executer le ficher database.sql dans votre gestionnaire de base de donnée pour installer la base de donnée et avoir les informations de teste.
- Ouvrez un terminal de commande dans le dossier du projet et demarer le server php `php -S localhost:8000`
- Ouvrez [http://localhost:8000](http://localhost:8000) dans votre navigateur

# Reglages

Sur Windows
Dans src/Autoload/Atoload.php
Commenter "$class = str_replace('\\', '/', $class);" a la ligne 18 et a la ligne 33

Sur Linux, Ubuntu...
Dans src/Autoload/Atoload.php
Décommenter "$class = str_replace('\\', '/', $class);" a la ligne 18 et a la ligne 33
