#!/bin/bash

# Prompt for the directory containing your index.php file

DIRECTORY="./"

# Check if the directory exists
if [ -d "$DIRECTORY" ]; then
    # Prompt for the port number
    read -p "Enter the port number to use for the PHP server (default is 8000): " PORT
    PORT=${PORT:-8000}

    # Start the PHP built-in web server
    php -S localhost:$PORT -t "$DIRECTORY" &

    # Wait for a moment to ensure the PHP server has started
    sleep 2

    # Start Cloudflared as a reverse proxy
    # read -p "Enter the name of your Cloudflared tunnel: " TUNNEL_NAME
    cloudflared tunnel --url localhost:$PORT # --name $TUNNEL_NAME &
else
    echo "Directory not found: $DIRECTORY"
fi

