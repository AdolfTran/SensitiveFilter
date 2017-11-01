# Sensitive Filter
Hide sensitive text in string

## Installation
`$ composer require ductran/sensitive-filter`

#### Quick start
```PHP
use \Ductran\SensitiveFilter\Facades\SensitiveFilter;

// example hide sensitive
SensitiveFilter::on()->withRegex('/[0-9]{10}/')->withRegex('/([a-z0-9_-]{6,9})/')->filter('$$$^^^&[myp4ssw0rd] 0979306603');
```

## Contributing
1. Fork it!
2. Create your feature branch: `$ git checkout -b feature/your-new-feature`
3. Commit your changes: `$ git commit -am 'Add some feature'`
4. Push to the branch: `$ git push origin feature/your-new-feature`
5. Submit a pull request.

## License
