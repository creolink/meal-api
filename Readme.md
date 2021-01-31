install `composer`
run `php composer.phar install`

go to docker container: `docker exec -it meal-api-php bash`

execute migrations: `bin/console doctrine:migrations:migrate`

MySQL Workbench
 



POST http://localhost:8040/user/create
Headers:
 Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJpYXQiOjE2MDcyNjU4NjcsImV4cCI6MTYwNzI2OTQ2Nywicm9sZXMiOlsiUk9MRV9VU0VSIl0sInVzZXJuYW1lIjoidXNlckB1c2VyLmRldiJ9.Z8K63BfFR1Yt6o3QPLYbaC6kCSLRVhD880Yd8_d_m1sPn-8ebWcSF8cywIc0VB5Ex6F-PpBhEKwZOtcpAbL73Sc5G3aAuSt1rlkLsmF12yrnVWPe53-CKzllLSrwQU-zv1y60ZxObGsVt-4nGIGX6cJmdlt5kA4Wsk6NyFtuQt9KDPMIOo-9iOHx0qCEA--L6v5va4NJ4lbWy6DI6bssLlDf-zTWR5Wm-1yf-RSDHA_UefItgox4n9RnpyNrwJ9M0J4xdRNsCq3t7yFPLa7_c9pXl56sQmqY0CUOk6I-uCIfQmQPo8nM0kFTIJ00qYtEb9Je9p7bbJv4vulns89h89zNq8--wiBx5brp820g2JdNgmvPCxb4i3TJw6ABcLYgRPkBB1yKHiAaJ9sE9SeI7iG-gMCodMgRJc4vK8MmKtIGsfb2OJo2IxLmh4uQmch43mfAE7p9J4Abd0Jc8Ww-fq2U60OVaC4bLKLZ8tF9LtW5UnmhGOopvB7SF52wr-Al2WtO3Th4ICVQHyNzmqq30ENslN_xYJ0SmeJAadNxts2hqhvdOH-WJ6KlQ6nIFKSXrr0LxjWmS2U1X5ZyNoAE4FfwI3orl9c-Q320htxxzfu8i-4CVbW6nwb2D7pWVvdyDayvMyrVMtw0tmScrcDxqRbf-qRFze20f-I2i1BPAug
Body:
```
{
"email": "my@my.pl4",
"password": "test",
"country": "pl"
}
```

POST http://localhost:8040/auth/login
Body:
```
{
"email": "user@user.dev",
"password": "test"
}
```
(returns JWT token)

POST http://localhost:8040/auth/register
Headers:
Body:
```
{
"email": "admin@admin.dev",
"password": "test",
"repeated_password": "test",
"country": "pl"
}
```




