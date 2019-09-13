# PHP simple SMTP REST API
A simple REST API to send e-mails throw your SMTP server.

## Why
In a simple personal project written in javascript, I had the need to send an e-mail with the results.

I didn't want to hire a paid service, as the project was for a punctual and non-commercial use, and I decided to implement a simple REST API that would allow me to use any SMTP server.

Then, I implemented a form in my javascript project, which requested data from the SMTP server at the beginning, and sent the e-mails through this REST API.

## Installation
```
git clone https://github.com/chuano/api-smtp.git
cd api-smtp
cmoposer install
```

## Request
Send POST request with json body with this struture
```
{
    "host": "smtp.yourhost.com",
    "port":  25,
    "encryption": null,
    "username": "your-smtp-username",
    "password": "your-smtp-password",
    "email": "from@email.com",
    "to". "to@email.com",
    "subject": "Your email subject",
    "body": "Your html or plain text body"
}
```

## Ok response
If e-mail wos successfully sent, you'll get 200 http status code and a sucess message.
```
{
    "message". "E-Mail sent."
}
```

## Error response
Else, you'll get  500 http status code and a description of error.
```
{
    "message". "Error description."
}
```

