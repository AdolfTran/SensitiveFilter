# Sensitive Filter
Hide sensitive information in string

## Installation
`$ composer require ductran/sensitive-filter`

## Usage

```PHP
use \Ductran\SensitiveFilter\Facades\SensitiveFilter;
```
#### Hide Email
```PHP
  $filter = new \Ductran\SensitiveFilter\SensitiveFilter();
  $filter->addProcessor(new \Ductran\SensitiveFilter\EmailProcessor());
  echo $filter->filter('duc@gmail.com adasd test@gmail.com');
```
  
#### Hide Id Card
```PHP
  $filter = new \Ductran\SensitiveFilter\SensitiveFilter();
  $filter->addProcessor(new \Ductran\SensitiveFilter\IdCardProcessor());
  echo $filter->filter('dadads2478-8339-3242-2423dsdsa2478-8339-3242-2424');
  ```
  
#### Hide string matching regex string 
```PHP
  SensitiveFilter::on()->withRegex('/[0-9]{10}/')->withRegex('/([a-z0-9_-]{6,9})/')->filter('$$$^^^&[myp4ssw0rd] 0979306603');
  ```
## Contributing
1. Fork it!
2. Create your feature branch: `$ git checkout -b feature/your-new-feature`
3. Commit your changes: `$ git commit -am 'Add some feature'`
4. Push to the branch: `$ git push origin feature/your-new-feature`
5. Submit a pull request.

## License
MIT License
