<img align="left" width="100" height="100" src="./public/build/images/reusablecog_250x250.png">

# Error Dictionary Bundle
<br>
<br>
The Error Dictionary Bundle is a Symfony bundle designed to simplify the generation of error management pages. It allows you to display error descriptions, associated codes, exceptions, and response codes by simply filling out a YAML configuration file.

## Installation

You can install the ErrorDictionary using Composer:

```bash
composer require reusablecog/error-dictionary-bundle
```

## Features

- Error Definition Configuration: Define error codes, labels, descriptions, categories, status codes, and associated exceptions in a YAML configuration file.
- Easy Integration: Seamlessly integrate error management pages into your Symfony project.

## Usage

To use the Error Dictionary Bundle, you need to define error codes and their details in the configuration file. Here's an example:

```yaml
#config/packages/error_dictionary.yaml
error_dictionary:
    error_definition:
        999999:
            label: The resource was not found in database.
            description: The resource was not found in database.
            category: Home
            status_code: 404
            exception: ResourceNotFound
        9E8302:
            label: Incorrect payload for the registration API.
            description: In the registration API all fields are required.
            category: Account
            status_code: 400
            exception: BadRequest
```

## Versions

| PHP version | Symfony version | Composer flags |
|-------------|:---------------:|---------------|
| \>= 8.1     |    6.x / 7.x    |                |
|             |                 |               |
|             |                 |               |

## Contributing

If you encounter any issues or would like to contribute to Error Dictionary Bundle, feel free to create a pull request or submit an issue on the GitHub repository.

## License

The Error Dictionary Bundle is open-source software licensed under the MIT license.