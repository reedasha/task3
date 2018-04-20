<h3>First note</h3><br>
<p> As the Mail Driver that is used is MailGun, the free account allows to send mails only to authorised users, thus you have to be in my list of authorised recipients, before inserting your email for request. 
</p>

<h3>Second note</h3><br>
<p> As the Queue Driver is sync, which is set by default in Laravel, it does send email asynchronously and does the specified job in a queue, however it performs it as there is no queue, that is why the response is slow, as the email is sent synchronously. For now I have not changed the queue driver to Gearman, but I will do it the today at night or tomorrow. 
</p>


