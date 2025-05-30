# Okala Store IDs Collector

A PHP script designed to systematically query the Okala API and extract a comprehensive list of valid store IDs. By automating the retrieval of store details, it enables users to efficiently compile and maintain an up-to-date dataset of active Okala stores for analysis, integration, or further processing.

> This repository contains a PHP script to fetch and collect valid store IDs from the Okala API.

---

## About

The script `okala-get-store-details.php` iterates through a range of store IDs and queries the Okala API to retrieve store details. Valid store IDs are saved to a file named `store-ids.txt`. This can be useful for anyone who wants to gather a list of active store IDs from Okala's legacy store endpoint.

---

## Features

- Automatically loops through store IDs from 2000 up to 10399.
- Makes authenticated API requests with a Bearer token.
- Checks for valid store responses and saves valid store IDs to a file.
- Handles HTTP errors and JSON decoding errors gracefully.
- Includes delay between requests to avoid API rate limiting.

---

## Requirements

- PHP 7.0 or higher (with cURL extension enabled).
- Valid API Bearer token from Okala (replace the placeholder token in the script).

---

## Usage

1. Clone the repository:
   ```bash
   git clone https://github.com/BaseMax/okala-store-ids.git
   cd okala-store-ids
   ```

2. Edit `okala-get-store-details.php` to update the `$token` variable with your valid API token.

3. Run the script from the command line or via your web server:

   ```php
   php okala-get-store-details.php
   ```

4. Valid store IDs will be appended to the file store-ids.txt.

## Notes

The script uses a hardcoded latitude and longitude in the API URL; modify if necessary.

Adjust the range `$storeId = 2000` to `$storeId < 10400` as needed.

Consider adding error handling or logging enhancements based on your needs.

## Contact

For any questions or issues, please open an issue in this repository.

## License

This project is licensed under the MIT License. See the LICENSE file for details.

Happy coding!
