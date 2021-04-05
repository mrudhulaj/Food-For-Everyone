<p align="center"><img src="https://user-images.githubusercontent.com/27756559/101247868-d2903480-3741-11eb-9355-f6cc40f57298.png" width=100 height=100></p>

<p align="center">    
<img src="https://upload.wikimedia.org/wikipedia/commons/thumb/6/61/HTML5_logo_and_wordmark.svg/512px-HTML5_logo_and_wordmark.svg.png" alt="HTML 5" width=45 height=45>
<img src="https://upload.wikimedia.org/wikipedia/commons/thumb/d/d5/CSS3_logo_and_wordmark.svg/1200px-CSS3_logo_and_wordmark.svg.png" alt="CSS" width=35 height=45>
<img src="https://i.pinimg.com/originals/41/95/cf/4195cf989fac0128a89669f40a1e3496.png" alt="Bootstrap" width=40 height=40>
<img src="https://upload.wikimedia.org/wikipedia/commons/thumb/6/6a/JavaScript-logo.png/768px-JavaScript-logo.png" alt="Javascript" width=40 height=40>
<img src="https://cdn4.iconfinder.com/data/icons/scripting-and-programming-languages/512/JQuery_logo-512.png" alt="JQuery" width=40 height=40>
<img src="https://pngimg.com/uploads/php/php_PNG7.png" alt="PHP" width=40 height=40>
<img src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/9a/Laravel.svg/1200px-Laravel.svg.png" alt="Laravel" width=40 height=40>
<img src="https://pngimg.com/uploads/mysql/mysql_PNG23.png" alt="MySQL" width=40 height=40>

</p>

## Food For Everyone

Food For Everyone is a website which helps to connect restaurent owners and event planners to distribute the leftover food to the needy people instead of letting them go to waste.The website also allows the functionality for users and volunteers to add causes, events and add/become volunteer.All of these functionalities are monitored and controlled by the administrator.The administrator has the power to enable or disable any of the above functionalities (via permissions) and also to approve or reject the causes, events or volunteer request before they are made live to the public.

Front-end: 
- HTML
- CSS 
- Bootstrap 
- Javascript/Jquery.

Back-end :
- PHP
- Laravel Framework (Framework)
- MySQL

## Modules & Pages

The web application has 4 modules:

- Administrator Module
- Volunteer Module
- User Module
- Guest Module

The following are the common pages:

- Home
- About Us
- Available Foods
- Causes
- Volunteers
- Events
- Contact Us

The following are the pages exclusive to administrator:

- Dashboard
- Reports
- Permissions
- Locations
- Approvals
- Contact Messages

## Administrator Module

Administrator Module has the most functionalities and power among the other modules.Within this module one can approve or reject the added causes, volunteers, events.These details are visible to the common user, volunteer and guest only after the administrator approval.

Administrator Pages :

- Dashboard
![dashboard](https://user-images.githubusercontent.com/27756559/113590195-6b2cb780-9643-11eb-852f-42ee8e141e69.png)

The administrator can see a glimpse of the overall actions from here. The categories can also be filtered by time or by related sub categories.

- Reports
![reports](https://user-images.githubusercontent.com/27756559/113590419-ac24cc00-9643-11eb-9131-6d3637c91cc3.png)

An overview of all the datas added can be viewed from here in the form of reports.

- Permissions
![permissions](https://user-images.githubusercontent.com/27756559/113590525-d2e30280-9643-11eb-9cb7-e236ea556a4d.png)

The permissions alloted to user or volunteer can be modified from here.

- Approvals
![approvals](https://user-images.githubusercontent.com/27756559/113590616-ef7f3a80-9643-11eb-98f2-9b3bbfeab18f.png)

Every cause, event or volunteer has to be approved by the administrator before they go public.The administrator can also reject them either with a reason or without reason.

- Locations
![locations](https://user-images.githubusercontent.com/27756559/113590764-176e9e00-9644-11eb-8527-3b7a5d9cdf8a.png)

The available locations for adding foods, causes, events and volunteers are added by the administrator.

- Contact Messages
![contactMessages](https://user-images.githubusercontent.com/27756559/113590842-379e5d00-9644-11eb-8230-30d6f8981ee8.png)

The contact messages (either a ticket raised or non ticket messages) are displayed here. They can either be moved to review or mark as resolved from the individual contact messages details page.

## User Module

User Module is the basic module with least permissions.Within this module one can provide donations,add available foods.

Other activities like adding causes, event or become a volunteer etc are subject to administrator approval.One can submit the request here but it has to be verified and approved by the administrator to become live.

- Available Foods
![availableFoods](https://user-images.githubusercontent.com/27756559/113591214-abd90080-9644-11eb-8296-b002ce088f0c.png)

The user can view/add/edit foods from here.

- Causes
![causes](https://user-images.githubusercontent.com/27756559/113591333-ce6b1980-9644-11eb-8aa7-7cc6837f012a.png)

The user can view/add/edit causes from here.

- Volunteers
![volunteers](https://user-images.githubusercontent.com/27756559/113591408-e8a4f780-9644-11eb-88bc-266c3d1b7feb.png)

The user can either become a volunteer or add other volunteers (if permission is set by administrator) from here.

- Events
![events](https://user-images.githubusercontent.com/27756559/113591527-0bcfa700-9645-11eb-9a62-6e732f0733e1.png)

The user can view/add/edit events from here.

- Contact
![contact us](https://user-images.githubusercontent.com/27756559/113591641-36b9fb00-9645-11eb-9140-ab26b5a83f14.png)

The user can send a message to admin from here.A normal message or a raised ticket can be send from here after selecting the appropriate categories and their item.

## Volunteer Module

Volunteer Module is the module handled by the approved volunteers.From here one can approve the added causes, other volunteers, events if the permission is allowed by the administrator.

Within this module one can control or monitor the activities of the other normal users as well.

## Guest Module

Guest module provides only the viewing ability to the users.Any other activity like donation or adding food etc requires one to login.
