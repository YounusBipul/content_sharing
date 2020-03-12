# content_sharing
A content sharing website using Laravel

### Technologies used
Laravel, HTML, Bootstrap, Mysql

### Description
1. Client Facing Website<br>
A content sharing platform with user registration and login. The content will hereafter be referred to as “story”. When user lands on the website he will be presented with recently shared stories and a registration/login form.
For registration User will be asked to give some basic information as name. email, date of birth, phone, gender, avatar image and password. Non-Registered User can view stories but won’t be able to share/post their stories or see and post comments on shared content.
Registered User can post/share new stories. Stories will consist of a title, body/story, a section, multiple tags and accompanying image and image caption. Stories will be categorized in to sections and will be searchable by title, body, section, and tags. A story can be blocked/unlisted by the admin.
Registered User can also view and post comments on the stories shared by other users. The comment will just consist of a comment body text. Non-registered user won’t be able to view comments on shared stories.
Registered user will have a profile page where they can update their profile data and view list of stories shared by them and can perform edit and delete on stories created by them.


2. Administrative & Management Web Panel<br>
The admins of the site will be able to view latest content and comments shared by the users. They will be able to set content as unlisted if they deem content inappropriate or otherwise. The unlisted content won’t be visible to the users but will be visible in the users’ profile and marked appropriately.
Admins will be able to view registered users and search for them. They will also be able to block users from the panel.

### Setup
* create a mysql database "content_sharing"
* in the project directory run command "php artisan migrate"
* Manually add Admin in user table (id must be 1. this idicates Admin in this project)
* Add a few categories in databse
* finally run "php artisan serve"
