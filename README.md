##Overview##
This script is designed to provide temporary support for users of Breeze Church Mgmt Software (https://www.breezechms.com/).  A feature had been requested related to "Smart Tag" (https://rcovenant.breezechms.com/features/view/418) and while waiting for the consideration and deployment we looked for a work around.  Utilzing the available API (https://www.breezechms.com/api) we found a way to solve our problem.

The script leverages the API to find all records that need to be changed and then updates.  It can be freely edited to remove tags or make other changes as needed.

This script requires a working php server that can reach the breezechms software online.  Crontab and a functioning mail() call is also helpful.

##Setup##
The script is reasonably self documenting, but you need to make some customizations for each use case.
* Update API Key/value
    * To get an API key login as an Admin to https://rcovenant.breezechms.com/extensions/api
* Update Filter Section
   * Utilize the URL on the website to determine the filter key and value to add to the filter
* Replace "subdomain" with the actual subdomain for your church in the system
* Replace "admin@yourchurchdomain.org" with appropriate email
    * This section can be commented out if you dont want to get emails each time the process runs.


##Crontab Setup##
Once you have your script setup and working as desired the best way to keep tags/people in sync is to schedule the task to run via crontab each hour/day/week.  

Below is an example setup that runs each day at 7:05AM using the php command line and logs the output to DirectoryTag.log.
```
#Check directory tag status
5 7 * * * /usr/local/bin/php ~/tools/tagupdate.php >>  ~/Cronlogs/DirectoryTag.log 2>&1
```


