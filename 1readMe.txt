
Ecom for = Become A Full Stack Web Developer - Beginner To Advanced
login = [FreeTutorials.Us] Udemy - php-with-laravel-for-beginners-become-a-master-in-laravel

Discovered Package: fideloper/proxy
Discovered Package: intervention/image
Discovered Package: laravel/tinker
Discovered Package: nunomaduro/collision
Discovered Package: laravelcollective/html (New)



-----------------------------
----- Ajax development ------
-----------------------------


--- L5.5 and Ajax Tutorial - Advanced CRUD example Search, Sort, Paginate ---


Version:	ecom3.35.zip
Status		Become A Full Stack Web Developer - Beginner To Advanced. 
Decription:	This ecom3 is originally come from the tutorial of: Become A Full Stack Web Developer - Beginner To Advanced.
		Then now, I will continue this tutorial and apply what I learned in AJAX and JSON.
		
		In 11. Admin Panel - Authentication tutorial, we create manually auth in backend. We don't use the auth scaffolding in Laravel.
		I create BackendAuthController and backend_views.modules.auth files. But I still stay use the User Model

		In 11. Admin Panel - Authentication Folder, 3. Logging in admin user and guards video
		Discuss about guard. You can check it on app>config>auth.php
		
		Itong BackendAuthController and backend_views.modules.auth files ay pwede ko gamitin sa login na gusto ko matutunan kila Kien.

		Additional data in Products 
		* Previous and recent PHP and Dollar SRP
		* Sale Status
		* Product Attributes (See the previous ecom)		
		* Copy the Product table of the previous ecom
		* size_and_fit
		* and study the ecom_store product table and the relationship to other tables



Version:	ecom3.34.zip
Status		Success.
Decription:	CRUD Ajax Jason with modal form in TagsController is working good. 
		I have just minor details to fix in modal delete. 
		Because everytime I delete, the trace of previous deleted data was still written.
		Need to reload to erase the trace.

Version:	ecom3.33.zip
Status		Just a back up. I succeed to my objectives in version 32.
		I have just minor details to fix.

Version:	ecom3.32.zip
Status		Just a back up. I love my experimented delete method because it contain _token. Check delele in Tags.


Version:	ecom3.31.zip
Status		Incomplete
Resource:	// #5.1 Laravel CRUD using AJAX (JQuery).MP4 (inside the folder of L5.4 and Ajax -  Hero Sony (Random))
Description:	Maganda sana yung concept kaso nag re-reload yung page bawat function kaya di ko na tinapos.
		Mag explore na ako ng JS codes. Tapos tuloy na ako sa Ecommerce tutorial. 

Version:	ecom3.30.zip
Status:		Success, Good, End of Tutorial
Resources:	L5.4 and Ajax -  Hero Sony (Random) (video tutorial with number 4.)
Description:	I observed that using javascript, no need to use a parameter in the URL.
		Behind the scene, parameters can pass from html fields to JSON to Server. 


Version:	ecom3.29.zip
Status:		Success, Good, End of tutorial
Resources:	Laravel 5.5 Ajax Tutorial - ADVANCED CRUD example Search, Sort, Paginate with Ajax.MP4
Description:	Not working the font-awesome icon sorting asc/desc.
		The JS method applied in this tutorial is advance. It's OOP method. Short version of code but powerful one. 
		I don't really get how it works, hope to understand the logical structure.
		
		Medyo weird din yung view files dito sa tutorial. 
		Kasi sa ajax.blade.php yung starting point,
		tapos pag gagawa ng bagong/ibang page mag start na ang html tags sa container.
		Kaya pag nag direct go to ka sa mga specific URL, hindi detected yung mga styles and script.
		Pero pag nag click ka sa mga designated button para makapunta sa mga page, working fine yung mga pages. 
		The key is on the js code of this tutorial, and I don't know how it works.
			
		This tutorial is great, some of my favorite is the automation of data. 
		Everytime I insert data, automatically it register in the datatable without reloading/refreshing and ready searchable.
		It has also a validation, search, sort alpabetically and pagination.
		But the downside of this tutorial it can only perform CRUD in text field,  focus only in one table,
		don't discuss how to insert images and CRUD with multiple relationship in database and array.
		There's a lot of if else structure, multiple function in one method.
		In next version of mine, I try to chunks the code hoping to understand structure



 


----------L5.5 and Ajax jQuery - Alex Petro ----------

Version:	ecom3.28.zip
Status:		Success, Good, 
Resources:	End of L5.5 and Ajax jQuery - Alex Petro tutorials
Description:	I improve the search in FrontPostController. That's working fine, 
		but I need to have a condition where cannot search the post with status == 0. 
		I did my best but I failed, hoping to fix it in the future with the help of google.
		
		I am not yet finish in debugging the problem in version ecom3.27.zip, 
		the issue about data validation and automatically registered the inserted and updated data in my datatable without reloading.
		
		I decide to skip the #8 Laravel 5.5 advance autocomplete search jquery-ui and #9 Laravel 5.5 advance datepicker jquery-ui
		because it used the npm package and the vue js. Check my notes in version ecom3.25 and 26 for the details of my problem.
		
		This tutorial is great, some of my favorite is the automation of data. 
		Everytime I insert data, automatically it register in the datatable without reloading/refreshing and ready searchable.
		It has also a validation, search, pagination.
		But the downside of this tutorial it can only perform CRUD in text field and don't discuss how to insert images


Version:	ecom3.27.zip
Status:		Ok, but need improvement
Resources:	#7 Laravel 5.5 advance validation ajax query part 7
Description:	I changed the URL of javascriptOneDatatableController in datatables.blade.php.
		Because I notice that even I create that controller, I am still using the route of javascriptOneController.
		So technically, I have a logical error.
		See the route for more info.
		
		I also delete the read function in javascriptOneDatatableController. 
		Because if I am not mistaken, the read function is for reload data button in the previous tutorial that I deleted in the previous version.
		I delete the reload data button because I decide to don't have a press button to reload my data table.
		I would like auto refresh my datatable without reloading
		
		And the main development here in this version is advance validation, in insert only, not included the update data.
		The validation is implemented. But the problem is, one of my function sufferred.
		In my previous version, everytime I insert and update data, it's automatically registered in my datatable without reloading.
		So this is the problem now that I am having a hard time to solve.. Hoping to debug it.

		After having a backup of this file, I try to clean the codes, in javascript tutorial related files only.
		
Version:	ecom3.26.zip
Status:		Success, Don't delete for future development and experiment
Resources:	Experiment
Description:	I failed to do tutorial #5 Laravel 5.5 Advance Datatable With NPM Installer part 5.
		So I conduct experiments from the previous version, instead of using NPM, I used the datatables of eliteadmin (from my admin side template)
		So far I obtained my objectives to use datatables js plugins.
		You can found it in datatables.blade.php and javascriptOneDatatableControllers.
		I just developed the function of previous pagination.blade.php and javascriptOnecontrollers



Version:	ecom3.25.zip
Status:		Failed, need improvement, don't delete for future development
Resources:	#5 Laravel 5.5 Advance Datatable With NPM Installer part 5
Description:	Wag ito idelete, magagamit pa ito pag nakakita na ako ng tutorial for laravel 5.6
		In this tutorial I am trying to do how to install nodejs, npm install, datatables.net.
		Then nag install ako ng datatable dependencies pero ayaw mag connect.
		Sa vuejs ko ito pinadaan.

		"dependencies": {
        		"datatables.net": "^1.10.19",
        		"datatables.net-dt": "^1.10.19"
    		}



Version:	ecom3.24.zip
Status: 	Success
Resources:	#4 Laravel 5.5 Advance Pagination Ajax Jquery part 4, and the previous tutorials..
Description:	Just a backup 3.. But the insert, edit, update, delete, and pagination are working properly
		Before I jump to using datatables.net



Version:	ecom3.23x.zip
Resource:
Status:		Need improvement
Description:	OK: Search using ajax in Post in client side = FrontPostsController.
		OK/But not good quality: Insert data using ajax in Post Tags = TagsController
		Now, I create a JavascriptOneController, student and sex model, javascriptPracticeOne.js, javascriptPractices1 folder and files




Version:	ecom3.23.zip
Resource:	
Status:		Need improvement
Description: 	Just a backup 3.. But the insert, edit, update, delete are working properly


Version:	ecom3.20.zip	
Status:		Success, Good
Resources:
Description:	Ok na yung search using ajax in Post in client side = FrontPostsController.
		Insert data using ajax in Post Tags = TagsController





-------------------------------------------------------------
----- Previous versioning control in Ascending order. -------
-------------------------------------------------------------


Success
May ginalaw ako sa GUI. Back up lang baka masira ko. Pwede idelete pag nag success

Success
try ko yung tut kung paano mag delete ng user at lahat ng data sa iabg pang table na related sa user.

Success
try ko gumawa ng table na doon lahat ng mga images.

Success
start na ng pag gawa ko ng post in user side

Success
may babaguhin ako sa comment table.
gusto ko kasi user id lang ang kunin, wala ng author, email field sa comment table.
Kunin na lang lahat sa user table.

Success
baguhin ko yung comment table. Kasi gusto ko mag fall lahat data ng comment at replies sa comment table. Lalagyan ko na lang ng comment id para sa mga replies

Success
Target ko gawin ang slide toggle ng comment reply form

Success
Before installation of Installation request for cviebrock/eloquent-sluggable ^4.6 -> satisfiable by cviebrock/eloquent-sluggable[4.6.0].


Cancelled
TinyMCE at Filemanager (new repo/package)


Success
Upgrade eloquent-sluggable 4.0 to 4.5

Finish
[FreeTutorials.Us] Udemy - php-with-laravel-for-beginners-become-a-master-in-laravel

Success
Create Default Data and Images | Seeder

Success
I am able to learn new method in laravel collectives.
Creating a custom and dynamic form

Success
I used method='POST' sa form
tapos mag lalagay ako ng ganito {!! Form::hidden('_method','DELETE, PUT')!!}

