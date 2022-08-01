### 1. Laravel Coding Test Task
The task will contain a few core features most applications have. That includes connecting to an API, basic MVC, exposing an API, and tests.  
The API we want you to connect to is https://kanye.rest/.  
The application should have the following features.

- A web page that shows 5 random Kayne West quotes with Livewire (must)
-  The quotes should be refreshed automatically every 60 seconds(must)
-  There should be a button to refresh the quotes (must)
-  Authentication for this page should be done with a password (must)
-  An API route should be available to fetch 5 random Kayne West quotes (must)
-  Provide a README on how we can set up and test the application (must)
-  Create a GitHub repo a publish the resulting work there (must)
-  The API route is secured with a token (nice to have)
-  It should be mobile-friendly (nice to have)

- Make use of Laravel Sail in your local environment(nice to have)
- The above features are tested with Feature tests (nice to have)
- The above features are tested with Unit tests (nice to have)


#### Notes
- HTML/CSS/JS styling is not part of this, it doesn’t matter how it looks.

### 2. Installing Guide
- clone the project from git   
   https://github.com/olegmicode/creative-afx-test

- install the depedencies.   
  ```compose install```

- .env file configuration   
  Copy ```.env.example``` and paste. And then rename it as ```.env```
  Update the db configuration. 

- migrate the database  
  ```php artisan migrate```

- seed the database  
  ```php artisan db:seed```

- run the dev server  
  ```php artisan serve```

- You can check api  
  #### For the web interface   
```http://localhost:8000/```  
  #### For the api interface
  
  Get Token
```http://localhost:8000/api/get-token```  
  Json Input   ```{"email":"admin@example.com",  "password":"password" }```
  Get the kanye Rest APi
```http://localhost:8000/api/kanye-rest```  
  Barear token from Token Input