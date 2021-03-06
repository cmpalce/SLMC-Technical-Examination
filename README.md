# SLMC Technical Examination

## Requirements
- Virtual Box
- Vagrant
- Homestead

## Setup

#### Fetch codebase
```
git clone git@github.com:cmpalce/SLMC-Technical-Examination.git
```

#### Install using Vagrant
```
cd SLMC-Technical-Examination/Homestead
vagrant up
```

#### Check backend

The server domain is 192.168.11.11. 
Verify that backend was setup by checking http://192.168.11.11/api/users in the browser.
You should see the list of users that was fetched from https://jsonplaceholder.typicode.com/users.

#### Check frontend
Verify that backend was setup by checking http://192.168.11.11/frontend in the browser.
You should see the mockup dashboard as shown below.

### Setup frontend for development

Frontend is setup for production as specified in "Check frontend" section. 
However, to perform the frontend development, you have to run
the development server. To do so, you have to enter Homestead by running
"vagrant ssh" in the Homestead folder. The commands below assumes you are inside Homestead:


```
cd /home/vagrant/code/frontend
npm install
npm run serve
```

After successfully running the above command, you may verify the frontend
by checking http://192.168.11.11:8080/#/ in the browser.

## Other Notes

### Backend Testing

```
cd /home/vagrant/code/backend
./vendor/bin/phpunit tests
```

### Fetch Users In Console
```
cd /home/vagrant/code/backend
php artisan migrate:fresh
php artisan users:fetch
```

### Mockup
![Mockup](https://raw.githubusercontent.com/cmpalce/SLMC-Technical-Examination/master/mockup/mockup.png)

### Database
![Database](https://github.com/cmpalce/SLMC-Technical-Examination/blob/master/database/slmc.png)
