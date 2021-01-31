install `composer`
run `php composer.phar install`

go to docker container: `docker exec -it meal-api-php bash`


http://localhost:8040/user/create
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

http://localhost:8040/auth/login
Headers:
 Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJpYXQiOjE2MDY4NTczMDksImV4cCI6MTYwNjg2MDkwOSwicm9sZXMiOlsiUk9MRV9VU0VSIl0sInVzZXJuYW1lIjoiYWFAc3Muc3NhIn0.eWyi47cyblpXWwb8keP7unRAjVGoqtt9NGiarOXt7jqSwFHjg9UHuBKdzLX2v0eXgNCCU8Ejgs1srxnrX7da-mcm6rW4MDjm0JZjgWAdvt_yZOY-KHjJr9jgg_MzSFujmyWAJm5Z1NpzVKIpKKqmnjC6LPjWOgPMrGpv57gq_ZsHYEV1xyKlFIU7ZZezNSpz0Ygxyxuv9xu9mVhiM6SRuxsOuMuaCLbymn2SbGnSKmuSMh8kILxeRhKnirWmT1vS7SQhXUAw64TddpIibC_Pmxv2ZjZ-nqwU4f372fk-qEiX2SblVg1SvrT3FLMieUCwXUZir2CpFfoKj5KZGay4wppQfS_sjQIY0PQh4Rshq-8zaQrclbaE8PPEfkvXmTv9GS94TCeDNE0dq5NJWm7gxuSZQy9JmZas73U703W7JoBj7tC9z_wlb6sOr95Sm12zqQcvRJoXfiFvbCWGUy5RutUFxxkrIcg67HIIrdNHQTB_NcZeRW7Tgl81oVkspWw0yDQ9g4d7-1nOV--GCA_ekcmfYVnmVlTQUHmdryY7VpQBJwcDikndhrU_EEw-kJy6R-3XvPAOhekmFogmi_xydjRsxg5wiIT_scJ9WBIiZPyl3RmT1dG-R_4F1sht29a--5Q0Q-CRtpx3-eRhPoenBeZ09IkMdQkqC6UfurPDnAE
Body:
```
{
"email": "user@user.dev",
"password": "test"
}
```

http://localhost:8040/auth/register
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
