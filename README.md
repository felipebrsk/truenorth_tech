# TrueNorth Technology - Shop Platform
 

Content Table
=================
<!--ts-->
   * [Technologies](#tecnologias)
   * [About](#Sobre)
   * [Features](#features)
   * [Installation](#instalacao)
   * [Status](#status)
   * [ScreenShots](#visao)
<!--te-->

<a name="tecnologias">**Tecnologies used**</a>
- Laravel 
- MySQL
- JavaScript - Alpine
- Blade - Tailwind
- JWT

<a name="Sobre">**About**</a>
## The TrueNorth Technology is a store (personal project) developed in <a href="https://laravel.com/docs/8.x/">laravel</a> and <a href="https://tailwindcss.com/docs">tailwind</a>. In addition to containing Alpine.Js properties, JWT authentication to API, tests and more.

<a name="features">**How it works**</a><br>
- Filters to paginate and product stock in ERP control
- Feature to set the product with released now, best seller (will show the first 8 results of database best_seller in home view)
- Show, edit and delete products in ERP control
- Cart management with Alpine.js feature
- Slider show in home view 
- Lines features (ex.: Line Intel-Core 10th generation)
- Voyager integration (http://127.0.0.1/admin/)


<a name="instalacao">**Installation**</a><br/>
- Clone the repository<br>
```
$ git clone https://github.com/felipebrsk/truenorth_tech
```
- Switch to the repo folder<br/>
```
$ cd truenorth_tech
```
- Install all the dependencies using composer<br>
```
$ composer install
```
- Install the npm dependencies<br/>
```
$ npm install && npm run dev
```
- Copy the example env file and make the required configuration changes in the .env file<br>
```
$ cp .env.example .env
```
- Generate a new application key<br/>
```
$ php artisan key:generate
```
- Run the database migrations (Set the database connection in .env before migrating)<br>
```
$ php artisan migrate
```
- Start the local development server<br/>
```
$ php artisan serve
```
- To give a admin permission, set<br/>
```
$ php artisan voyager:admin your@email.com
```
You can access in http://127.0.0.1:8000/
<br/>

<a name="status">**Status**</a>
<h4 align="left"> 
	🚧  TrueNorth Technology - Shop Platform - Developing...  🚧
</h4>

<a name="visao">**ScreenShots**</a>
![ProductsBestSellersRates](https://user-images.githubusercontent.com/75860661/112007611-9079db80-8b03-11eb-9340-3961c33ec813.jpeg)<br/>
![Home Overview](https://user-images.githubusercontent.com/75860661/112007651-9a9bda00-8b03-11eb-8b82-ce6719eb98c0.jpeg)<br/>
![ERP control](https://user-images.githubusercontent.com/75860661/112007719-a6879c00-8b03-11eb-8e55-a406c26bac46.jpeg)<br/>
![Show Product View](https://user-images.githubusercontent.com/75860661/112007788-b4d5b800-8b03-11eb-9d02-8ec4f82db992.jpeg)<br/>
![Cart](https://user-images.githubusercontent.com/75860661/112007824-bc955c80-8b03-11eb-82c5-37bf440d4beb.jpeg)<br/>
