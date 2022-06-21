# Web Application Firewall Example

Using mod-security2 as Apache Module to learn about Web Application Firewall.

Exercise propose by Marco Simões professor at UNEB.

## Run cmd

```bash
docker build -f src/Dockerfile src -t modsec2
docker run --name modsec2 -d -p 80:80 -v $PWD/src/www/:/var/www/site/:rw modsec2
```

## Test WAF Running


1. Access as a regular user the [homepage](http://localhost)
2. Try to execute a malicious script on our [homepage using query parameters (CSRF)](http://localhost?exec=%2Fbin%2Fsh%20rm%20-rf%20%2F)