<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use League\CommonMark\Reference\Reference;

class CreateDetailPlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('details_plan', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('plan_id')->constrained('plans')->onDelete('cascade');
            $table->string('name');
            $table->timestamps();
                    
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detail_plans');
    }
}
