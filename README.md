# Photogallery

# Installation
1. git clone https://github.com/EfremovVasiliy/photogallery.git
2. cd photogallery/homestead
3. Open Homestead.yaml and enter path for synced folder:  
   folders:
    - map: /path_to_/photogallery   
    - to: /var/www/photogallery
4. vagrant up && vagrant ssh
5. cd /var/www/photogallery
6. composer install
7. artisan migrate
8. artisan storage:link
9. At your host-system open new CMD|Terminal in photogallery forlder and 
    enter two commands:   
        npm install  
        npm run dev    
10. Open http://localhost
11. You could to create testing data with command:   
    artisan db:seed
