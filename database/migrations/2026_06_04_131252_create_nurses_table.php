<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('nurses', function (Blueprint $table) {
            $table->id();
            // Basic Details
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('phone')->unique();
            $table->string('email')->nullable();
            $table->date('dob')->nullable();
            $table->enum('gender', ['Male', 'Female', 'Other'])->nullable();

            // Profile
            $table->string('profile_image')->nullable();
            $table->text('about')->nullable();

            // Experience
            $table->integer('experience_years')->default(0);

            // Pricing
            $table->decimal('price_per_day', 10, 2)->nullable();
            $table->decimal('price_per_visit', 10, 2)->nullable();

            // Languages
            $table->string('languages')->nullable(); // Bengali,Hindi,English

            // Identity Proof
            $table->string('identity_proof_type')->nullable(); // Aadhaar, PAN, Voter ID
            $table->string('identity_proof_number')->nullable();
            $table->string('identity_proof_front')->nullable();
            $table->string('identity_proof_back')->nullable();

            // Nursing Certificate
            $table->string('certificate_number')->nullable();
            $table->string('certificate_document')->nullable();

            // Address
            $table->string('address')->nullable();
            $table->string('city')->default('Kolkata');
            $table->string('state')->default('West Bengal');
            $table->string('pincode')->nullable();

            // Verification
            $table->boolean('is_verified')->default(false);
            $table->timestamp('verified_at')->nullable();

            // Status
            $table->boolean('is_available')->default(true);
            $table->boolean('is_featured')->default(false);
            $table->decimal('rating', 3, 2)->default(0);
            $table->integer('total_reviews')->default(0);

            // SEO
            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nurses');
    }
};
