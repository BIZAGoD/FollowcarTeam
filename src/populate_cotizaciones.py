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

# List of possible states
ESTADOS = ['Pending', 'Approved', 'Rejected']

try:
    # Connect to the database
    conn = mysql.connector.connect(**db_config)
    cursor = conn.cursor()
    print("Database connection successful!")

    # SQL query to insert data into Cotizaciones
    insert_query = """
    INSERT INTO Cotizaciones (
        DiagnosticoId, NumeroCotizacion, Subtotal, IVA, Total, Estado,
        MotivoRechazo, FechaAprobacion, FechaExpiracion, CreatedAt, UpdatedAt
    )
    VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)
    """

    # Generate data
    data = []
    for _ in range(NUM_ENTRIES):
        DiagnosticoId = random.randint(1, 1000)  # Assuming 1000 diagnoses
        NumeroCotizacion = faker.bothify(text='COT-#######')  # Example: COT-1234567
        Subtotal = round(random.uniform(100, 10000), 2)
        IVA = round(Subtotal * 0.16, 2)  # Assuming 16% IVA
        Total = round(Subtotal + IVA, 2)
        Estado = random.choice(ESTADOS)
        MotivoRechazo = faker.text(max_nb_chars=200) if Estado == 'Rejected' else None
        FechaAprobacion = faker.date_time_between(start_date='-1y', end_date='now') if Estado == 'Approved' else None
        FechaExpiracion = faker.date_time_between(start_date='now', end_date='+30d')
        CreatedAt = faker.date_time_between(start_date='-1y', end_date='now')
        UpdatedAt = faker.date_time_between(start_date=CreatedAt, end_date='now')

        data.append((
            DiagnosticoId, NumeroCotizacion, Subtotal, IVA, Total, Estado,
            MotivoRechazo, FechaAprobacion, FechaExpiracion, CreatedAt, UpdatedAt
        ))

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
