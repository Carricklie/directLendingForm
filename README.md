# directLendingForm
Hello, 
Carrick here!

To run this app you need:
- XAMPP (any version)
Download link : https://www.apachefriends.org/download.html

when installing, remember the place you install the xampp 
because you need to put this folder in the htdocs of the 
xampp instalation folder 

To run the app,
Open XAMPP
Turn on :
- Apache
- MySQL

STEPS TO RUN THE APP :

![image](https://user-images.githubusercontent.com/76893921/216811278-c6b94188-62db-48b2-84f9-aa634b7b494b.png)

1. Download the zip in this github

2. Put this folder in the xampp install directory, in xampp/htdocs

3. Open browser and input: http://localhost/

![image](https://user-images.githubusercontent.com/76893921/216812391-0334932a-1c63-4eb5-9e8d-1adaa1aee2c6.png)

4. Click on phpMyAdmin

![image](https://user-images.githubusercontent.com/76893921/216812404-53c9131f-1057-4f8d-8e55-c8fc0081be0d.png)

5. Click on import

![image](https://user-images.githubusercontent.com/76893921/216812526-b0783f92-ecde-4274-8413-5b4d7a5a5ec7.png)

6. Import the directlendingsocidia.sql file 

8. Open Link : http://localhost/directLendingForm/Form.php

Assumptions List:
- ID of postcode same as Value because postcode itself is unique for each state
- Users need to input the correct postal code to proceed to submit where wrong postal code not be recognized
- The postal code list is retrieved in the start of loading the website and saved in javascript variable where no crutial/forbidden information given to the user. 
- The state filled in database only for the 3 use cases
