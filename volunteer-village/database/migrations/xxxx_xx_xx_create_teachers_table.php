use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeachersTable extends Migration
{
    public function up()
    {
        Schema::create('teacher', function (Blueprint $table) {
            $table->id('Teacher_ID'); // This will auto-increment
            $table->string('Teacher_name');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('teacher');
    }
}
