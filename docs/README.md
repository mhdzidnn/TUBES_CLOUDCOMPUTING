# Project Setup

Follow these steps to set up the project:

## Step 1: Unzip the Repository

1. Download the project repository zip file.
2. Unzip the file to your desired directory.

## Step 2: Install Dependencies

1. Open your terminal.
2. Navigate to the project directory.
3. Run the following command to install the required dependencies:

    ```bash
    composer install
    ```

## Step 3: Update the .env File

1. Copy the `.env.example` file and rename it to `.env`.

    ```bash
    cp .env.example .env
    ```

2. Open the `.env` file in a text editor.
3. Update the database configuration and other necessary environment variables:

    ```env
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=your_database_name
    DB_USERNAME=your_database_user
    DB_PASSWORD=your_database_password

    # Midtrans configuration
    MIDTRANS_SERVER_KEY=your_server_key
    MIDTRANS_CLIENT_KEY=your_client_key
    ```

## Step 4: Serve the Application

1. Run the following command to start the development server:

    ```bash
    php artisan serve
    ```

2. Open your browser and navigate to `http://127.0.0.1:8000` to view the application.

# Midtrans Setup

Follow these steps to set up Midtrans for payment processing:

## Step 1: Create an Account

1. Visit the [Midtrans website](https://midtrans.com/).
2. Click on the "Sign Up" button and follow the registration process to create a new account.

## Step 2: Get the Server Key and Client Key

1. Log in to your Midtrans account.
2. Navigate to the dashboard.
3. Go to `Settings` > `Access Key` or this [link](https://dashboard.sandbox.midtrans.com/settings/config_info).
4. Copy the `Server Key` and `Client Key`.

    ```markdown
    MIDTRANS_SERVER_KEY=your_server_key
    MIDTRANS_CLIENT_KEY=your_client_key
    ```

5. Update call back url on [Nonification URL Page](https://dashboard.sandbox.midtrans.com/settings/payment/notification)
6. Update UI Snap on [Snap Preference Page](https://dashboard.sandbox.midtrans.com/settings/snap_preference)

## Step 3: Payment Demo

1. To test the payment integration, use the Midtrans payment simulator.
2. Visit the following link to access the payment demo:

    [Midtrans Payment Simulator](https://simulator.sandbox.midtrans.com/qris/payment/gopay)

3. Follow the on-screen instructions to complete a test payment.
   Note: Copas the qris image address
