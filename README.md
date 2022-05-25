# ABM-productos-servicios
prueba

1. Copiar el archivo .env en .env.local y configurar la variable DATABASE_URL 

Desde la consola ejecutar:

3. bin/console doctrine:database:create

4. bin/console doctrine:schema:create

5. bin/console doctrine:fixtures:load

6. symfony server:start -d