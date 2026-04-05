<?php

namespace App\Support;

/**
 * Database portability (Supabase PostgreSQL → MySQL or MariaDB):
 *
 * - Use Eloquent models and the query builder only. Avoid DB::raw(), database-specific
 *   functions, and PostgreSQL-only types (jsonb, uuid native, etc.) in application code.
 * - Migrations should use Schema:: facade with portable column helpers Laravel maps
 *   correctly for both drivers.
 * - Moving data later: export tables from Supabase (SQL or CSV) and import into
 *   phpMyAdmin; then set DB_CONNECTION=mysql and run migrations on the new server, or
 *   align schema manually if you import structure+data together.
 */
final class PortableQueries
{
}
