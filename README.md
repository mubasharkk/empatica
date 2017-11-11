# Empatica Assignment

This project display a dashboard for data related to downloads
of the mobile application for the company.

### Task

At Empatica we are developing a new system to accommodate the many Embrace users that
will upload their physiological signals in our cloud architecture. 
Your task is to create a dashboard that can be used internally to show a real time overview of our mobile apps download.

## Setup

1. Create a folder
2. Clone this repository in the folder
3. Clone my [homestead repository](https://github.com/mubasharkk/empatica-dev-vm) in the same folder
4. Go to folder **empatica-dev-vm** and run `vagrant up --provision`             
5. You can access the dashboard via [http://dashboard.empatica.dev/](http://dashboard.empatica.dev/)

### Your folder structure will look like this :
```
project
|
└───empatica-dev-vm
│   │   Vagrantfile
│   └───resources
│       │   ...
│ 
└───empatica
│   │   composer.json
│   └───app
│       │   ...
│   └───public
│       │   ...
│   └───db-dump
│       │   ...
│   
```


## Backend API


**GET REQUEST**

Request to get download data via API

http://dashboard.empatica.dev/api/download

**POST REQUEST**

Request to add download entry data via API

http://dashboard.empatica.dev/api/download

|Field|Type|Description|
| ----- |-----| ----- |
|app_id| required; string (max:100)|Application id that has been downloaded|
|latitude| required; string (max:100)|Latitude of the download entity|
|longitude| required; string (max:100)|Longitude of the download entity|

## Frontend 

The frontend is based on react js, the related files can be found at ```resources/assets/js```.
The dasboard offers 4 types of data analysis about the downloads.

1. Downloads data
2. Downloads peeks hours per app (live graph)
3. Downloads by country (live graph)
4. Overall apps popularity (live graph)

**Note:** Due to limit manageable for this task, I was not able to added more features to it.

## Files to look into

```
app
|
└───Http
│   │   
│   └───Controllers
│       │   ...
│   └───Requests
│       │   ...
│ 
└───Services
│   │   
│   └───Dashboard
│       │   ...
│   └───Downloads
│       │   ...
│   └───MobileApp
│       │   ...
resources
|
└───assets
│       │   ...
│   └───js  //react files
│    
```