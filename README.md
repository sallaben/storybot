# storybot - a Snapchat community story

Visit http://www.reddit.com/r/storybot if you have any questions about the bot!

### To install:

##### Requirements [most servers have all these]: 
- PHP
- cURL
- Cron job (if not planning to moderate)
- MySQL
- gzip functions
- json functions

##### Copy files
Copy all the files found in the repository to a new directory on your server.

##### MySQL setup
In your web host, create a new database with any name you'd like and add a new MySQL user to it with full permissions. In phpMyAdmin or some other database editor, import "storybot.sql" (found in the directory you copied the files to in the previous step) into the database you just created. If you receive no errors, you should see some tables populating the database.

##### Google account setup
1. Create a new Google account (or, you can use an existing one).
2. Visit this page and click "Unlock": https://accounts.google.com/b/0/DisplayUnlockCaptcha
3. Enable 2-Step Verification in Settings
4. Generate a new App Password for "other" at this page: https://security.google.com/settings/security/apppasswords

##### Install
1. Visit your web host in the directory Storybot was copied to, and it should automatically redirect you to /install/. Fill out your MySQL details and if you receive any errors when you continue the installer, simply press the BACK button on your browser and correct them. 
2. Input your Snapchat username and password. Then, input your Google username (include the domain [@gmail.com, etc]) and the app password you created in Step 4 of the Google account setup. Submit the form.
3. If you receive an incorrect Snapchat or Google username/password error, and you're 100% sure the username and password are correct, press the BACK button on your browser and resubmit the form with the same details - not really sure why, but it usually works on the second time if not the first.
4. Fill out options you'd like - moderation, time for picture snaps, videos allowed, etc.
5. Submit the form and you should receive a "Storybot has been successfully installed" page! 
6. Delete the /install/ directory for security purposes. You can now send snaps to the account and have them appear in the moderation queue! If you wanted every snap to be auto uploaded to the story without moderation, now you can create a Cron job in your web host for some time interval with the command: `curl http://www.yoursite.com/storybot/bot.php` (replace the URL with the location of your bot.php).

####Enjoy!
