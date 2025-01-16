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

# List of possible states and priorities
ESTADOS = ['Scheduled', 'Completed', 'Cancelled', 'In Progress']
PRIORIDADES = ['Low', 'Medium', 'High']

try:
    # Connect to the database
    conn = mysql.connector.connect(**db_config)
    cursor = conn.cursor()
    print("Database connection successful!")

    # SQL query to insert data into Citas
    insert_query = """
    INSERT INTO Citas (
        ClienteId, VehiculoId, TipoServicioId, MecanicoId, FechaHora, Estado,
        MotivoCancelacion, ObservacionesCliente, ObservacionesInternas,
        Prioridad, CreatedAt, UpdatedAt
    )
    VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)
    """

    # Generate data
    data = []
    for _ in range(NUM_ENTRIES):
        ClienteId = random.randint(1, 1000)  # Assuming 1000 clients
        VehiculoId = random.randint(1, 1000)  # Assuming 1000 vehicles
        TipoServicioId = random.randint(1, 50)  # Assuming 50 service types
        MecanicoId = random.randint(1, 200) if random.random() > 0.1 else None  # 10% chance of no mechanic
        FechaHora = faker.date_time_between(start_date='-1y', end_date='now')
        Estado = random.choice(ESTADOS)
        MotivoCancelacion = faker.text(max_nb_chars=200) if Estado == 'Cancelled' else None
        ObservacionesCliente = faker.text(max_nb_chars=300) if random.random() > 0.2 else None
        ObservacionesInternas = faker.text(max_nb_chars=300) if random.random() > 0.3 else None
        Prioridad = random.choice(PRIORIDADES)
        CreatedAt = faker.date_time_between(start_date='-1y', end_date='now')
        UpdatedAt = faker.date_time_between(start_date=CreatedAt, end_date='now')

        data.append((
            ClienteId, VehiculoId, TipoServicioId, MecanicoId, FechaHora, Estado,
            MotivoCancelacion, ObservacionesCliente, ObservacionesInternas,
            Prioridad, CreatedAt, UpdatedAt
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
