This script is designed to provide temporary support for users of Breeze Church Mgmt Software (https://www.breezechms.com/).  A feature had been requested related to "Smart Tag" (https://rcovenant.breezechms.com/features/view/418) and while waiting for the consideration and deployment we looked for a work around.  Utilzing the available API (https://www.breezechms.com/api) we found a way to solve our problem.

The script is reasonably self documenting, but you need to make some customizations for each user.




#Check directory tag status
5 7 * * * /usr/local/bin/php ~/tools/tagupdate.php >>  $HOME/Cronlogs/DirectoryTag.txt 2>&1

