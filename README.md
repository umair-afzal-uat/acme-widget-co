# Acme Widget Co. Sales System

This project implements a simple sales system for Acme Widget Co. It includes a basket system that calculates totals based on products, delivery charges, and special offers.

## Classes

- **Product**: Represents a product with a code and price.
- **Offer**: Represents special offers applied to the basket.
- **Basket**: Manages the products in the basket, calculates totals, applies offers, and determines delivery charges.

## Usage

1. Create products and offers.
2. Initialize the `Basket` with products and offers.
3. Add products to the basket using the `add` method.
4. Calculate the total using the `total` method.

## Docker Setup

To run this project using Docker, follow these steps:

### Prerequisites

- Docker: [Install Docker](https://docs.docker.com/get-docker/)
- Docker Compose: [Install Docker Compose](https://docs.docker.com/compose/install/)

### Building and Running the Application

1. **Clone the Repository**

   If you haven’t already cloned the repository, do so with:

   ```bash
   git clone <https://github.com/umair-afzal-uat/acme-widget-co.git>
   cd <acme-widget-co>
   ```

2. **Build the Docker Image**

   Build the Docker image using Docker Compose:

   ```bash
   docker-compose build
   ```

3. **Start the Docker Containers**

   Start the containers in detached mode:

   ```bash
   docker-compose up -d
   ```

4. **Access the Application**

   Open your web browser and navigate to `http://localhost:8000` to view the application.

5. **Stop and Remove Containers**

   When you’re done, you can stop and remove the containers with:

   ```bash
   docker-compose down
   ```

### Testing

To run tests using PHPUnit within the Docker container:

1. **Access the Container**

   Enter the running container:

   ```bash
   docker-compose exec app /bin/bash
   ```

2. **Run PHPUnit Tests**

   Inside the container, run:

   ```bash
   vendor/bin/phpunit tests/BasketTest.php
   ```

## Local Setup (Without Docker)

If you prefer to run the project locally without Docker:

1. **Install Dependencies**

   Install PHP dependencies using Composer:

   ```bash
   composer install
   ```

2. **Run the Application**

   Start the PHP built-in server:

   ```bash
   php -S localhost:8000
   ```

3. **Run Tests**

   Run tests using PHPUnit:

   ```bash
   vendor/bin/phpunit tests/BasketTest.php
   ```

```

### Refrence

