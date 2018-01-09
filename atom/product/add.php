<html>
<head />
<body>
  <form action="add_proc.php" method="post" enctype="multipart/form-data">
    <table border="1" align="center">
      <tr>
        <td>상품명</td>
        <td><input type="text" name="name"></td>
      </tr>
      <tr>
        <td>재고</td>
        <td><input type="text" name="stock"></td>
      </tr>
      <tr>
        <td>가격</td>
        <td><input type="text" name="price"></td>
      </tr>
      <tr>
        <td>상품이미지</td>
        <td><input type="file" name="file"></td>
      </tr>
      <tr>
        <td colspan="2" align="center"><input type="submit" value="등록"></td>
      </tr>
    </table>
  </form>
</body>
</html>
