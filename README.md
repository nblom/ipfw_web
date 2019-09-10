# ipfw_web
Web gui and cronjob to easly allow access to visitors ip

*cronjob.sh*
Runs every few seconds or so, checks for ip in /tmp/ipfw_ip and allows all traffic to me on rule number 2002.
If an old rule exists it deletes the old rule first.

*public_html*
Folder to be served with apache for allowing easy access for users.

Credentials are added in index.php as plain text, jay for security.

This is not meant to protect anything sensitive.
