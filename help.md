- project-root/
  - app/
    - controllers/
      - CourseController.php
      - UserController.php
    - models/
      - Course.php
      - User.php
    - views/
      - courses/
        - index.php
        - show.php
      - users/
        - index.php
        - show.php
    - config/
      - database.php
    - helpers/
      - url_helper.php
  - public/
    - css/
      - bootstrap.min.css
    - js/
      - bootstrap.min.js
    - index.php


=====
Cette architecture utilise un répertoire app pour stocker les classes de modèles, de contrôleurs et de vues. Les fichiers pour les cours et les utilisateurs ont chacun leur propre sous-répertoire de vues. Les fichiers de configuration de la base de données et d'autres fonctions d'assistance peuvent être stockés dans le répertoire config et helpers, respectivement. Les fichiers CSS et JavaScript externes, tels que Bootstrap, peuvent être stockés dans le répertoire public pour une accessibilité facile.