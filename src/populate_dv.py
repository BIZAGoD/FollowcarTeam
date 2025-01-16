import mysql.connector
from faker import Faker
from datetime import datetime, timedelta
import random

# Create a Faker instance
faker = Faker()

# Database connection configuration
db_config = {
    'host': 'localhost',
    'user': 'root',
    'password': '',
    'database': 'Followcar'
}

# Number of entries to generate
NUM_ENTRIES = 10000
CHUNK_SIZE = 500

# Possible `Tipo` values
TIPOS_DOCUMENTO = ['Seguro', 'Registro', 'Licencia', 'Inspección']

try:
    # Connect to the database
    conn = mysql.connector.connect(**db_config)
    cursor = conn.cursor()
    print("Database connection successful!")

    # SQL query to insert data into DocumentosVehiculo
    insert_query = """
    INSERT INTO DocumentosVehiculo (
        VehiculoId, Tipo, ArchivoUrl, FechaVencimiento, CreatedAt
    )
    VALUES (%s, %s, %s, %s, %s)
    """

    # Generate data
    data = []
    for _ in range(NUM_ENTRIES):
        VehiculoId = random.randint(1, 10000)  # Assuming 10000 existing vehicles
        Tipo = random.choice(TIPOS_DOCUMENTO)
        ArchivoUrl = f"/documents/{faker.uuid4()}/{faker.file_name()}"  # Custom file path
        FechaVencimiento = faker.date_time_between(start_date='-1y', end_date='+1y') if random.random() > 0.2 else None
        CreatedAt = faker.date_time_between(start_date='-1y', end_date='now')

        data.append((VehiculoId, Tipo, ArchivoUrl, FechaVencimiento, CreatedAt))


    # Insert data in chunks
    for i in range(0, len(data), CHUNK_SIZE):
        chunk = data[i:i + CHUNK_SIZE]
        cursor.executemany(insert_query, chunk)
        conn.commit()
        print(f"Inserted {len(chunk)} rows.")

    print("All rows inserted successfully!")

except mysql.connector.Error as err:
    print(f"Error: {err}")
    conn.rollback()

finally:
    if conn.is_connected():
        cursor.close()
        conn.close()
        print("Database connection closed.")
