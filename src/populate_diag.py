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

# Possible `Estado` values
ESTADOS = ['Pendiente', 'En Proceso', 'Finalizado', 'Cancelado']

try:
    # Connect to the database
    conn = mysql.connector.connect(**db_config)
    cursor = conn.cursor()
    print("Database connection successful!")

    # SQL query to insert data into Diagnosticos
    insert_query = """
    INSERT INTO Diagnosticos (
        CitaId, MecanicoId, Estado, DescripcionProblema, DiagnosticoDetallado,
        Recomendaciones, FechaInicio, FechaFin, FotosEvidencia, CreatedAt, UpdatedAt
    )
    VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)
    """

    # Generate data
    data = []
    for _ in range(NUM_ENTRIES):
        CitaId = random.randint(1, 1000)  # Assuming 1000 existing appointments
        MecanicoId = random.randint(1, 100)  # Assuming 100 existing mechanics
        Estado = random.choice(ESTADOS)
        DescripcionProblema = faker.text(max_nb_chars=200)
        DiagnosticoDetallado = faker.text(max_nb_chars=500) if random.random() > 0.3 else None  # 70% chance
        Recomendaciones = faker.text(max_nb_chars=300) if random.random() > 0.5 else None  # 50% chance
        FechaInicio = faker.date_time_between(start_date='-1y', end_date='-1d')
        FechaFin = FechaInicio + timedelta(days=random.randint(1, 10)) if Estado == 'Finalizado' else None
        FotosEvidencia = faker.text(max_nb_chars=200) if random.random() > 0.6 else None  # 40% chance
        CreatedAt = faker.date_time_between(start_date='-1y', end_date='now')
        UpdatedAt = faker.date_time_between(start_date=CreatedAt, end_date='now')

        data.append((
            CitaId, MecanicoId, Estado, DescripcionProblema, DiagnosticoDetallado,
            Recomendaciones, FechaInicio, FechaFin, FotosEvidencia, CreatedAt, UpdatedAt
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
