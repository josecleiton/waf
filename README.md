# Web Application Firewall Example

Using mod-security2 as Apache Module to learn about Web Application Firewall.

Exercise propose by Marco Simões professor at UNEB.

## Run cmd

```bash
docker-compose up --build
```

## Test WAF Running


1. Access as a regular user the [homepage](http://localhost)
2. Try to execute a malicious script on our [homepage using query parameters (CSRF)](http://localhost?exec=%2Fbin%2Fsh%20rm%20-rf%20%2F)


## Use cases (TODO: translate to en)

### SQL Injection


Send the following string on search form:  `'; DELETE FROM leads; -- a'`

### XSS

Send the following string on search form: `<script>alert('xss')</script>`

### CSRF

1. Login on Amazon
2. Click on "gatinhos" button =)


Facebook sends a crf token on every write request:

```javascript
fetch("https://www.facebook.com/api/graphql/", {
  "headers": {
    "accept": "*/*",
    "accept-language": "en-NZ,en;q=0.9,pt-BR;q=0.8,pt;q=0.7,en-GB;q=0.6,en-US;q=0.5",
    "content-type": "application/x-www-form-urlencoded",
    "sec-ch-prefers-color-scheme": "dark",
    "sec-ch-ua": "\".Not/A)Brand\";v=\"99\", \"Google Chrome\";v=\"103\", \"Chromium\";v=\"103\"",
    "sec-ch-ua-mobile": "?0",
    "sec-ch-ua-platform": "\"Windows\"",
    "sec-fetch-dest": "empty",
    "sec-fetch-mode": "cors",
    "sec-fetch-site": "same-origin",
    "viewport-width": "1221",
    "x-fb-friendly-name": "FriendingCometFriendRequestConfirmMutation",
    "x-fb-lsd": "34Ohisw-GV3C8PSg7zuobU",
    "cookie": "sb=ZiR_YiYepkIprqXlqbwanq8L; datr=ZiR_YhVdXl40Vf8xCj83Y0pI; c_user=100033973601070; usida=eyJ2ZXIiOjEsImlkIjoiQXJjZnNheWYxOHBpZiIsInRpbWUiOjE2NTM0Nzg2OTF9; xs=6%3Ad5xxzTyonkfN0g%3A2%3A1652499712%3A-1%3A5559%3A%3AAcUuFi8qTgiDkbB4a7hfnRPI4ochvSKvAf2rGxuLbJg; fr=0ZSCkhlhP0LAi4sOK.AWXCfh9VjgBJBXr9EGPMsZ9yiLE.BixIbf.6L.AAA.0.0.BixIbf.AWWNogvSPo0; presence=C%7B%22t3%22%3A%5B%5D%2C%22utc3%22%3A1657046759298%2C%22v%22%3A1%7D",
    "Referer": "https://www.facebook.com/",
    "Referrer-Policy": "strict-origin-when-cross-origin"
  },
  "body": "av=100033973601070&__user=100033973601070&__a=1&__dyn=7AzHJ16U9ob8ng5K8G6EjBWo2nDwAxu13wsongS3q2ibwyzE2qwJyEiwsobo6u3y4o2Gwfi0LVEtwMw65xO321Rwwwg8a8465o-cwfG12wOKdwGxu782ly87e2l2Utwwwi831wiEjwZwlo5qfK6E7e58jwGzEaE5e7oqBwJK2W5olwUwOzEjUlDw-wAxe261eBx_y88E6a0BFobpEbUGdG0HE88cA0z8c84qifxe3u364U&__csr=gT2QeMB99kQyEQIlsAvOEJOcnt9PcZiW9dkySO9F9WWAuABiOlHjiGIBemXJAjFLDgx5ti5p3Rj-uGS4XCG-vJeXykHtp8yi-BGnXzCFKiVJ6CAWBCDhEgmm9Djx6Fryqg8ajGaKm4ryFqUXBAK4ojBx26F8fupeicz8mUpxCdg9FrwIy8S18zox0goO4qyFocUK45yE9EOmcwsU2dzUS5E8UiyEeoW1fBAwnGwhUbUd8cocU3dx-m1Ewho2ro5e0U8O2S2a0dWwTw5-wqE7u08gw6vwjo0fGy01Zm1qg02zWg0e4u6V86e2O0gG01dlm04Qo1540dVw3k81Zo1Vo7m&__req=1k&__hs=19178.HYP%3Acomet_pkg.2.1.0.2.1&dpr=1&__ccg=EXCELLENT&__rev=1005789268&__s=m7ng5r%3Apungvj%3Adykty7&__hsi=7116961603644637861-0&__comet_req=15&fb_dtsg=NAcMi-xJE907mteH1do_Pya_oZTVeeQW5u5Al6bDodBXXy-wAaaflNQ%3A6%3A1652499712&jazoest=25457&lsd=34Ohisw-GV3C8PSg7zuobU&__spin_r=1005789268&__spin_b=trunk&__spin_t=1657046751&fb_api_caller_class=RelayModern&fb_api_req_friendly_name=FriendingCometFriendRequestConfirmMutation&variables=%7B%22input%22%3A%7B%22attribution_id_v2%22%3A%22CometHomeRoot.react%2Ccomet.home%2Clogo%2C1657046760421%2C874509%2C4748854339%22%2C%22friend_requester_id%22%3A%22100082852422389%22%2C%22source%22%3A%22rhc_friend_requests%22%2C%22actor_id%22%3A%22100033973601070%22%2C%22client_mutation_id%22%3A%223%22%7D%2C%22scale%22%3A1%2C%22refresh_num%22%3A0%7D&server_timestamps=true&doc_id=5231542923604712&fb_api_analytics_tags=%5B%22qpl_active_flow_ids%3D30605361%22%5D",
  "method": "POST"
});
```

### PHP Object Injection

1. Send on `index.php` name input form the following: `O:5:"Model":1:{s:4:"file";s:8:"damn";}`
2. Look to `Model` code in `model.php` (more specifically the destruct method)
3. If the image has root access to containers files, that code could delete any file on the system, possibly making the container temporally inaccessible. 


### Reverse Proxy Security

ModSecurity is typically used as a reverse proxy. Allowing the use of ModSecurity without modifying the destination server of the request (destination application), making ModSecurity quite versatile, as it applies to applications in environments that are not natively supported by the tool.

Let's use the [Volleyball API](https://github.com/josecleiton/volleyball-api) to demonstrate that: 

1. Add the API to the reverse proxy network: `docker network connect waf_volei-network volleyball-api-nestjs`
2. Access the API documentation using the reverse proxy to make sure everything is ok: `https://localhost:8001/docs`
3. Modsecurity itself already creates an encrypted connection to the backend that is protected by it, but this connection uses self-signed certificates.
4. Try to attack the vulnerabilities from the previous topics.
